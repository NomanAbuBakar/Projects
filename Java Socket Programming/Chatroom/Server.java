import java.io.*;
import java.net.*;
import java.util.*;
        
class Server implements Runnable
{
    Socket s;     
    public static Vector record = new Vector();
    public Server(Socket s)
    {
        try
        {
            System.out.println("New Client Connected ..." );
            this.s = s;
        }
        catch(Exception e)
        {   
            e.printStackTrace();
        }
    }     
    public void run()
    {
        try
        {
            BufferedReader reader = new BufferedReader(new InputStreamReader(s.getInputStream()));
            BufferedWriter writer = new BufferedWriter(new OutputStreamWriter(s.getOutputStream()));
            record.add(writer); 
            PrintWriter out = null;                
            while(true)
            {
                String msg = reader.readLine().trim();
                // File Processing
                String [] tokens = msg.split(" ");
                String fl = tokens[0];
                File file = new File(fl);
                if(file.exists())
                {
                }
                else
                {
                    file.createNewFile();    
                }
                int l = tokens.length;
                if(tokens[l-1].equals("$"))
                {
                    String str = "\n----- Your Record : ----\n";
                    String str1 = null;
                    BufferedReader brr = new BufferedReader(new FileReader(fl));
                    while((str1 = brr.readLine()) != null)
                    {
                        str += str1;
                        str += '\n';

                    }
                    out= new PrintWriter(s.getOutputStream(),true);
                    out.println(str);
                }
                BufferedWriter b = new BufferedWriter(new FileWriter(fl,true));
                b.write(msg);
                b.write("\n");
                b.flush();
                System.out.println("Received : "+msg);      
                int sz = record.size();

                for (int i=0 ; i<sz ; i++)
                {
                    try
                    {
                        BufferedWriter bw= (BufferedWriter)record.get(i);
                        bw.write(msg);
                        bw.write("\n");
                        bw.flush();
                    }
                    catch(Exception e)
                    {
                        e.printStackTrace();
                    }
                }
            }
        }
        catch(Exception e)
        {
            e.printStackTrace();
        }
    }
    public static void main(String[]args) throws Exception
    {
        System.out.println("Server is Running ... :)");
        ServerSocket ss = new ServerSocket(5959);
            
        while(true)
        {
            Socket s = ss.accept();
            Server obj = new Server(s);
            Thread serverThread=new Thread(obj);
            serverThread.start();
        }
    }
}