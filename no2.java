
import java.util.Scanner;

public class no2 {

    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        System.out.println("Input Tanggal : ");
        String tanggal = input.nextLine();
        System.out.println("Input Bulan : ");
        String bulan = input.nextLine();
        System.out.println("Input Tahun : ");
        String tahun = input.nextLine();

        // Ubah bulan ke format numerik
        String bulanNumerik;
        switch (bulan.toLowerCase()) {
            case "januari":
                bulanNumerik = "01";
                break;
            case "februari":
                bulanNumerik = "02";
                break;
            case "maret":
                bulanNumerik = "03";
                break;
            case "april":
                bulanNumerik = "04";
                break;
            case "mei":
                bulanNumerik = "05";
                break;
            case "juni":
                bulanNumerik = "06";
                break;
            case "juli":
                bulanNumerik = "07";
                break;
            case "agustus":
                bulanNumerik = "08";
                break;
            case "september":
                bulanNumerik = "09";
                break;
            case "oktober":
                bulanNumerik = "10";
                break;
            case "november":
                bulanNumerik = "11";
                break;
            case "desember":
                bulanNumerik = "12";
                break;
            case "1":
                bulanNumerik = "01";
                break;
            case "2":
                bulanNumerik = "02";
                break;
            case "3":
                bulanNumerik = "03";
                break;
            case "4":
                bulanNumerik = "04";
                break;
            case "5":
                bulanNumerik = "05";
                break;
            case "6":
                bulanNumerik = "06";
                break;
            case "7":
                bulanNumerik = "07";
                break;
            case "8":
                bulanNumerik = "08";
                break;
            case "9":
                bulanNumerik = "09";
                break;
            case "10":
                bulanNumerik = "10";
                break;
            case "11":
                bulanNumerik = "11";
                break;
            case "12":
                bulanNumerik = "12";
                break;

            default:
                bulanNumerik = "00";
        }

        String dateNumerik = tanggal + bulanNumerik + tahun;
        String reversedDateNumerik = new StringBuilder(dateNumerik).reverse().toString();

        if (dateNumerik.equals(reversedDateNumerik)) {
            System.out.println("POLINDROME");
        } else {
            System.out.println("BUKAN POLINDROME");
        }
    }
}
