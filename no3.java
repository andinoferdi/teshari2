import java.text.SimpleDateFormat;
import java.text.DateFormat;
import java.util.*;
import java.text.ParseException;

class DateTimeFormatDemo {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        System.out.println("Masukan Jam, Format Jam = 00:00:00 PM/AM");
        String jam = input.nextLine();
        DateFormat df = new SimpleDateFormat("hh:mm:ss aa");
        DateFormat outputformat = new SimpleDateFormat("HH:mm:ss");
        Date date = null;
        String output = null;
        try {
            date = df.parse(jam);
            output = outputformat.format(date);
            System.out.println(output);
        } catch (ParseException pe) {
            pe.printStackTrace();
        }
    }
}