/******************************************************************************
 * This program is to process .freq files generated for the FreqWear wearable
 * necklace. 
 *****************************************************************************/

import java.io.IOException;
import java.io.FileReader;
import java.io.BufferedReader;
import java.io.*;
import java.util.ArrayList;


public class Process
{
    /**************************************************************************
     * Main(): args[0] is the Frequency file
     *************************************************************************/
    public static void main(String[] args)
    {
        //System.out.println("Starting audio conversion... ");

        //String text = "Hello world";
        try 
        {
            ///////////////////////////INPUT CHECK/////////////////////////////
            if(args.length == 0)
            {
                throw new Exception("No File Entered...");     
            }
            else if(args.length > 1)
            {
                throw new Exception("Too Many Files Entered...");
            }
            
            ///////////////////////FILE BUFFERING//////////////////////////////
            File file_in_ = new File(args[0]+".freq");
            File file_out = new File("protocol.file");
            BufferedReader in_put = new BufferedReader( new FileReader( file_in_ ) );
            BufferedWriter output = new BufferedWriter( new FileWriter( file_out ) );
            ///////////////////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////////////////
            /////PARSE FREQ FILE AND FIND MAX FREQUENCIES FOR EACH SECOND//////
            ///////////////////////////////////////////////////////////////////
            String curr_line;
            String[]  arr = new String[2];
            int[] intARR;

            ////////FILL ARRAY LIST WITH PAIRS OF TIME AND FREQUENCIES/////////
            int      count            =    0,
                     curr_f           =    0, 
                     prev_f           =    0,
                     curr_t           =    0,
                     prev_t           =    0;

            float    temp             =    0;

          
            ArrayList<String[]> arrlist = new ArrayList<String[]>();
            ArrayList<int[]>    numlist = new ArrayList<int[]>();
 
            //////////SPLIT EACH LINE INTO AN ARRAY, ADD ARRAY TO LIST/////////
            while( (curr_line = in_put.readLine()) != null )
            {
                arr = curr_line.split(" ");
                arrlist.add( arr );
                count++;
            }

            //////FOR EACH STRING[] IN THE LIST, FIND MAX FREQ PER SECOND//////
            for(String[] str : arrlist)
            {
                curr_t = (int)Float.parseFloat(str[0]);
                curr_f = (int)Float.parseFloat(str[1]);

                if(curr_t > prev_t)
                {
                    intARR = new int[2];
                    intARR[0] = prev_t;
                    intARR[1] = prev_f;
  
                    numlist.add(intARR);

                    prev_t = curr_t;
                    prev_f = 0;
                }

                if(curr_f > prev_f)
                {
                    prev_f = curr_f;
                }

            }

            intARR = new int[2];
            intARR[0] = prev_t;
            intARR[1] = prev_f;

            numlist.add(intARR);
            ///////////////////////////////////////////////////////////////////

            //////////////////////VARIBLES FOR BYTE-STRING///////////////////// 
            byte    LED               =    0x0000,
                    MOTOR_SPEED       =    0x0000,
                    MOTOR_DURATION    =    0x0000,
                    MAGNET            =    0x0000, 
                    CURRENT           =    0x0000;
            int     led_state         =    0,
                    motor_state       =    0,
                    magnet_state      =    0,
                    duration_state    =    0,
                    prev_led_st       =    0,
                    prev_mtr_st       =    0,
                    prev_mag_st       =   -1,
                    ctr               =    0,
                    sum               =    0;
            String  byteString        =    "";
            ///////////////////////////////////////////////////////////////////

            CURRENT = (byte)0x0010;
            for(int[] num : numlist)
            {
                System.out.println(""+num[0]+" "+num[1]);
               
                /////////////////////////DEBUGGGGGGG!!!! STATE//////////////////////////
                if     (num[1] ==   0)                   { magnet_state =  0; MAGNET = (byte)0x0000; }//!
                else if(num[1] >    0 && num[1] <=  100) { magnet_state =  1; MAGNET = (byte)0x0001; }//"
                else if(num[1] >  100 && num[1] <=  200) { magnet_state =  2; MAGNET = (byte)0x0002; }//#
                else if(num[1] >  200 && num[1] <=  300) { magnet_state =  3; MAGNET = (byte)0x0003; }//$
                else if(num[1] >  300 && num[1] <=  400) { magnet_state =  4; MAGNET = (byte)0x0004; }//%
                else if(num[1] >  400 && num[1] <=  500) { magnet_state =  5; MAGNET = (byte)0x0005; }//&
                else if(num[1] >  500 && num[1] <=  600) { magnet_state =  6; MAGNET = (byte)0x0006; }//'
                else if(num[1] >  600 && num[1] <=  700) { magnet_state =  7; MAGNET = (byte)0x0007; }//(
                else if(num[1] >  700 && num[1] <=  800) { magnet_state =  8; MAGNET = (byte)0x0008; }//)
                else if(num[1] >  800 && num[1] <=  900) { magnet_state =  9; MAGNET = (byte)0x0009; }//*
                else if(num[1] >  900 && num[1] <= 1000) { magnet_state = 10; MAGNET = (byte)0x000A; }//+
                else if(num[1] > 1000 && num[1] <= 2000) { magnet_state = 11; MAGNET = (byte)0x000B; }//,
                else if(num[1] > 2000 && num[1] <= 3000) { magnet_state = 12; MAGNET = (byte)0x000C; }//-
                else if(num[1] > 3000 && num[1] <= 4000) { magnet_state = 13; MAGNET = (byte)0x000D; }//.
                else if(num[1] > 4000 && num[1] <= 5000) { magnet_state = 14; MAGNET = (byte)0x000E; }///
                else                                     { magnet_state = 15; MAGNET = (byte)0x000F; }//0
                /////////////////////////////////////////////////////////////// 

                CURRENT = (byte)(CURRENT | MAGNET);

                if(prev_mag_st == magnet_state)
                {
                    char[] charArr = byteString.toCharArray();
                    int length = charArr.length;
                    

                    if(length > 0)
                    {
                        CURRENT = (byte)charArr[length - 1];
                        CURRENT = (byte)(CURRENT + 0x0010);
                        charArr[length - 1] = (char)CURRENT;
                        byteString = new String(charArr);
                        
                    }
                    //CURRENT = (byte)(CURRENT + 0x0001);//m,;"
                    
                }
                else
                {
                    CURRENT = (byte)(0x0010 | MAGNET);                
                    byteString = byteString + (char)CURRENT;
                
                }
                prev_mag_st = magnet_state;
                                
//                byteString = byteString + (char)MAGNET;
//                MAGNET = (byte)0x0000;
                ///////////////////////////////////////////////////////////////
            }

            ///////////DEBUG///////////////////
            System.out.println(byteString);
            //System.out.println("Total: " + sum);
            ///////////////////////////////////

            output.write( byteString );
            output.close();
            in_put.close();
            //System.out.println("ALL GOOD... " + count);
        } 
        catch ( Exception e ) 
        {
            e.printStackTrace();
        }
    }//end main()

    public static int magnetState()
    {
        System.out.println("MAGNET");
        return 0;
    }

}//end class

