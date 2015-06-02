echo "---------Freq Wear-------------"

echo "-----Generating Pitch File-----"
rm Relax-1.pitch
aubiopitch -i Relax-1.mp3 >> Relax-1.pitch

echo "-----Generating CSV -----------"
rm out.csv
java Process Relax-1.pitch >> out.csv

echo "------Done With Process--------"
