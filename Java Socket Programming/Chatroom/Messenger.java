import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.io.*;
import java.net.*;
public class Messenger implements Runnable
{
    public String user_name = "Assigned For User Name";
    BufferedWriter writer;
    BufferedReader reader;
    BufferedReader input;
    public JTextField tx;
    public JTextArea ta;
    Socket socketClient;
    public Messenger(String u_name)
    {
        user_name = u_name;        
        
        JFrame f = new JFrame("Chatroom");
        f.setSize(350,350);        
        
        JPanel p1 = new JPanel();
        p1.setLayout(new BorderLayout());
            
        JPanel p2 = new JPanel();
        p2.setLayout(new BorderLayout());        
        
        tx = new JTextField();
        p1.add(tx, BorderLayout.CENTER);
        
        JButton b1 = new JButton("Send");
        p1.add(b1, BorderLayout.EAST); 
        
        ta = new JTextArea();
        p2.add(ta, BorderLayout.CENTER);
        p2.add(p1, BorderLayout.SOUTH);
        f.setContentPane(p2);
    
        try
        {
            socketClient= new Socket("localhost",5959);
            writer= new BufferedWriter(new OutputStreamWriter(socketClient.getOutputStream()));          
            reader =new BufferedReader(new InputStreamReader(socketClient.getInputStream()));
        }
        catch(Exception e)
        {
            e.printStackTrace();
        }
    
    
        b1.addActionListener(new ActionListener()
        {
            public void actionPerformed(ActionEvent ev) 
            {
                String s = user_name + " : " + tx.getText();  
                
                tx.setText("");
                try
                {
                    writer.write(s);
                    writer.write("\n");
                    writer.flush(); 
                }
                catch(Exception e)
                {
                    e.printStackTrace();
                }
            }
        }
        );
        
        f.setVisible(true);    
    }
    public void run()
    {
        try
        {       
            String serverMsg=""; 
            while((serverMsg = reader.readLine()) != null)
            {
                System.out.println(serverMsg);
                ta.append(serverMsg+"\n");
            }
            
        }
        catch(Exception e)
        {
            e.printStackTrace();
        }   
    }
}