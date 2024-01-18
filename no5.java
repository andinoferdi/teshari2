import java.io.*;
import java.util.Scanner;

public class no5 {
    public static void main(String args[]) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Masukan Jam : ");
        int h = sc.nextInt();
        System.out.print("Masukan menit : ");
        int m = sc.nextInt();
        if ((h >= 1 && h <= 12) && (m >= 0 && m <= 59)) {

            String words[] = { "", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten",
                    "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen",
                    "Nineteen",
                    "Twenty", "Twenty one", "Twenty two", "Twenty three", "Twenty four", "Twenty five",
                    "Twenty six", "Twenty seven", "Twenty eight", "Twenty nine" };

            String plu, a;
            if (m == 1 || m == 59)
                plu = "Minute";
            else
                plu = "Minutes";

            if (h == 12)
                a = words[1];
            else
                a = words[h + 1];

            System.out.print("Output dari jam : " + h + ":" + m + " adalah ");
            if (m == 0)
                System.out.println(words[h] + " O' clock");
            else if (m == 15)
                System.out.println("Quarter past " + words[h]);
            else if (m == 30)
                System.out.println("Half past " + words[h]);
            else if (m == 45)
                System.out.println("thirteen minutes to " + a);
            else if (m < 30)
                System.out.println(words[m] + " " + plu + " past " + words[h]);
            else
                System.out.println(words[60 - m] + " " + plu + " to " + a);
        }

        else
            System.out.println("Invalid Input !");
    }
}
