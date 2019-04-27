import java.util.*;

public class Client
{ 
    public static void main(String [] args)
    {
    	Scanner obj = new Scanner(System.in);
    	System.out.print("Plese Enter Your Name : ");
    	String name = obj.nextLine();
        try
        {
           	System.out.println("Initiating Connection ...");        	        
            Messenger client = new Messenger(name);   
            Thread t1=new Thread(client);
            t1.start();
    	}
    	catch(Exception e)
    	{
    	 	System.out.println("Some Problem got in the way of Connection due to some technical reason. It'll be soon recovered.");
    	}
    }
}
