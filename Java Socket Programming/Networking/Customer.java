import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.Socket;
import javax.swing.JOptionPane;
import java.util.*;
import java.io.PrintWriter;
import java.io.PrintStream;

class Customer extends Thread
{
	Scanner scan = new Scanner(System.in);
	PrintStream out = null;
	BufferedReader input;
	
	public void run()
	{
		String cus_in = "hello";
		while(!(cus_in.equals("EXIT")||cus_in.equals("Exit")||cus_in.equals("exit")))
		{
			try
			{
			String Address = "localhost";
			Socket s = new Socket(Address, 9090);
			
			
			System.out.print("Client : ");
			cus_in = scan.nextLine();

			out= new PrintStream(s.getOutputStream(), true);
			out.println(cus_in);
			}
			catch(Exception e)
			{
				System.out.println(e.getMessage());
			}
		}
	}
	
	public static void main(String[] args) throws IOException
	{
		Customer c = new Customer();
		c.start();
		//Scanner scan = new Scanner(System.in);
		//PrintWriter out = null;
		//BufferedReader input;

		



		/*
		out= new PrintWriter(s.getOutputStream(), true);
		out.println(cus_in);

		input = new BufferedReader((new InputStreamReader(s.getInputStream())));
		String getLineFromServer = input.readLine();

		System.out.println(getLineFromServer);
		*/
	}
}