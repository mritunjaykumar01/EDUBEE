import java.io.*;
import java.util.*;
import java.text.*;
import java.math.*;
import java.util.regex.*;
class Solution {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int n = in.nextInt();
        int i=0;
        double a[] = new double[n];
        for(i=0;i<n;i++){
            a[i] = in.nextDouble();
        }
        double sum=0;
        for(i=0;i<n;i++){
            sum = sum + a[i];
        }
        double m = sum/n;
        double fm = m;
       // System.out.println(m);
        m = (double)Math.round(m*100)/100;
        System.out.println(m);
        Arrays.sort(a);
        double median = 0;
        if(n%2==0){
            median = (a[n/2] + a[n/2-1])/2;
            median = (double)Math.round(median*100)/100;
            System.out.println(median);
        }else{
            int temp = n/2 + 1;
            median = a[temp];
            System.out.println(median);
        }
        int index = n-1;
        int count = 1;
        for(i=n-2;i>=0;i--){
            if(a[index] == a[i]){
                count++;
            }else{
                count--;
            }
            if(count == 0){
                index = i;
                count = 1;
            }
        }
        int mode = (int) a[index];
        System.out.println(mode);
        double sd=0;
        sum = 0;
        for(i=0;i<n;i++){
            sum = sum + (a[i] - fm)*(a[i]-fm);
        }
        sd = sum/n;
        sd = Math.sqrt(sd);
        sd = (double)Math.round(sd*100)/100;
        System.out.println(sd); 
    }
}