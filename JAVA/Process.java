


import java.io.IOException;
import java.io.FileReader;
import java.io.BufferedReader;
import java.io.*;

public class Process
{
    /**************************************************************************
     * Main(): args[0] is the Frequency file
     *         args[1] is the Beats Per Minute
     *         Files are generated with Aubio.
     *************************************************************************/
    public static void main(String[] args)
    {
        //System.out.println("Starting audio conversion... ");

        //String text = "Hello world";
        try 
        {
          byte a = 0x23;
          byte b = (byte)(a << 1);

          byte LED =              0x0000;
          byte MOTOR_SPEED =      0x0000;
          byte MOTOR_DURATION =   0x0000;
          byte MAGNET =           0x0000;


          


          File file_in_ = new File(args[0]+".freq");
          File file_out = new File("/var/www/html/MP3/protocol.file");
          BufferedReader in_put = new BufferedReader( new FileReader( file_in_ ) );
          BufferedWriter output = new BufferedWriter( new FileWriter( file_out ) );

          String text = "HERE??";

          ///////////////////////////////////
          output.write( text );
          output.close();
          in_put.close();
        } 
        catch ( IOException e ) 
        {
           e.printStackTrace();
        }
/*
        int LED = 0;

        try
        {
            if(args.length == 0)
            {
                throw new Exception("No File Entered...");     
            }
            else if(args.length > 1)
            {
                throw new Exception("Too Many Files Entered...");
            }

            //Create object of FileReader
            FileReader inputFile0 = new FileReader(args[0]);        
            //FileReader inputFile1 = new FileReader(args[1]);

            //Instantiate the BufferedReader Class
            BufferedReader bufferReader0 = new BufferedReader(inputFile0);
            //BufferedReader bufferReader1 = new BufferedReader(inputFile1); 

            //Variable to hold the one line data
            String line0 = "";
            //String line1 = "";

  */          
            // Combine the two sets of data...
            /*while ( ( (line0 = bufferReader0.readLine() ) != null)  || ( ( line1 = bufferReader1.readLine() ) != null ) )   
            {                                                          
                 if(line0 != null)
                 { 
                     String[] split0 = line0.split(" ");
                     //System.out.println(split0[0] + "," + split0[1]);
                 }

                 if(line1 != null)
                 {
                     String[] split1 = line1.split(" ");
                     System.out.println(split1[0]);
                 }
            }*/
            
            // Extract the time and intensity of the high frequencys...
    /*        while( (line0 = bufferReader0.readLine() ) != null )
            {
                String[] split0 = line0.split(" ");

                float freq = Float.parseFloat(split0[1]);

                if(freq < 100.00)
                {
                    LED = 0;
                }
                else if(freq >= 100.00 && freq < 200.00)
                {
                    LED = 1;
                }
                else if(freq >= 200.00 && freq < 300.00)
                {
                    LED = 2;
                }
                else if(freq >= 300.00 && freq < 500.00)
                {
                    LED = 3;
                }
                else if(freq >= 500.00 && freq < 900.00)
                {
                    LED = 4;
                }
                else if(freq >= 900.00 && freq < 2000.00)
                {
                    LED = 5;
                }
                else if(freq >= 2000.00 && freq < 3000.00)
                {
                    LED = 6;
                }
                else if(freq >= 3000.00 && freq < 4000.00)
                {
                    LED = 7;
                }
                else
                {
                    LED = 8;
                }  

                System.out.println( split0[0] + "," + split0[1] + "," + LED );

            }

            //Close the buffer reader
            bufferReader0.close();
            //bufferReader1.close();

            

        }
        catch(Exception e)
        {
            System.out.println("ERROR: " + e);

         
        }

    */

    }//end main()

}//end class

