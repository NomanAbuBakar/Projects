import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.Socket;
import javax.swing.JOptionPane;
import java.io.IOException;
import java.io.PrintWriter;
import java.io.*;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Date;


class Serve
{
	public static void main(String []args) throws IOException
	{ 
		ServerSocket listener = new ServerSocket(9090);
		Socket s = null;
		PrintWriter out = null;
		BufferedReader in;

		try
		{
			while(true)
			{
				s = listener.accept();
				in = new BufferedReader((new InputStreamReader(s.getInputStream())));
				String getLineFromCustomer = in.readLine();
				System.out.println(getLineFromCustomer);
				
				out= new PrintWriter(s.getOutputStream(),true);
				out.println("You have Been Connected to Server ...");
			}
		}
		finally
		{
			out.close();
			s.close();
			listener.close();
		}

	}
    
}