//Ömer Mesud TOKER
// 21302479

import java.sql.*;

public class SqlConnector {
    static String url = "jdbc:mysql://dijkstra2.ug.bcc.bilkent.edu.tr/omer_toker" ;
    static String username = "omer.toker";
    static String pass = "oxjd2ygx";
    
    public static void main(String[] args) throws ClassNotFoundException
    {
        Class.forName("com.mysql.jdbc.Driver"); 
        
        try{
            Connection con = DriverManager.getConnection(url, username, pass); 
            Statement stmt = con.createStatement();
            
            stmt.executeUpdate("DROP TABLE IF EXISTS owns;");
            stmt.executeUpdate("DROP TABLE IF EXISTS customer;");
            stmt.executeUpdate("DROP TABLE IF EXISTS account;"); 

            stmt.executeUpdate("CREATE TABLE customer" +
                               "(cid CHAR(12), name VARCHAR(50), bdate DATE, address VARCHAR(50), city VARCHAR(20), nationality VARCHAR(20)," +
                               "PRIMARY KEY(cid) )ENGINE=innodb;"); 

            stmt.executeUpdate("CREATE TABLE account" +
                               "(aid CHAR(8), branch VARCHAR(20), balance FLOAT, openDate DATE," +
                               "PRIMARY KEY(aid) )ENGINE=innodb;");

            stmt.executeUpdate("CREATE TABLE owns" +
                               "(cid CHAR(12), aid CHAR(8)," +
                               "FOREIGN KEY(cid) REFERENCES customer(cid), FOREIGN KEY(aid) REFERENCES account(aid) )ENGINE=innodb;");

            stmt.executeUpdate("INSERT INTO customer VALUES ('20000001', 'Cem', '1980-10-10', 'Tunali', 'ankara', 'TC');");
            stmt.executeUpdate("INSERT INTO customer VALUES ('20000002', 'Asli', '1985-09-08', 'nisantasi', 'istanbul', 'TC');");
            stmt.executeUpdate("INSERT INTO customer VALUES ('20000003', 'Ahmet', '1995-02-11', 'Karsiyaka', 'izmir', 'TC');");

            stmt.executeUpdate("INSERT INTO account VALUES ('A0000001', 'kizilay', 2000.00, '2009-01-01');");
            stmt.executeUpdate("INSERT INTO account VALUES ('A0000002', 'bilkent', 8000.00, '2011-01-01');");
            stmt.executeUpdate("INSERT INTO account VALUES ('A0000003', 'cankaya', 4000.00, '2012-01-01');");
            stmt.executeUpdate("INSERT INTO account VALUES ('A0000004', 'sincan', 1000.00, '2012-01-01');");
            stmt.executeUpdate("INSERT INTO account VALUES ('A0000005', 'tandogan', 3000.00, '2013-01-01');");
            stmt.executeUpdate("INSERT INTO account VALUES ('A0000006', 'eryaman', 5000.00, '2015-01-01');");
            stmt.executeUpdate("INSERT INTO account VALUES ('A0000007', 'umitkoy', 6000.00, '2017-01-01');");

            stmt.executeUpdate("INSERT INTO owns VALUES ('20000001', 'A0000001');");
            stmt.executeUpdate("INSERT INTO owns VALUES ('20000001', 'A0000002');");
            stmt.executeUpdate("INSERT INTO owns VALUES ('20000001', 'A0000003');");
            stmt.executeUpdate("INSERT INTO owns VALUES ('20000001', 'A0000004');");
            stmt.executeUpdate("INSERT INTO owns VALUES ('20000002', 'A0000002');");
            stmt.executeUpdate("INSERT INTO owns VALUES ('20000002', 'A0000003');");
            stmt.executeUpdate("INSERT INTO owns VALUES ('20000002', 'A0000005');");
            stmt.executeUpdate("INSERT INTO owns VALUES ('20000003', 'A0000006');");
            stmt.executeUpdate("INSERT INTO owns VALUES ('20000003', 'A0000007');");

            System.out.println("customer");
            ResultSet resultSet1 = stmt.executeQuery("SELECT * FROM customer");
            ResultSetMetaData rsmd1 = resultSet1.getMetaData();
            int columnsNumber1 = rsmd1.getColumnCount();
            
            for (int i = 1; i <= columnsNumber1; i++) {
                System.out.print(rsmd1.getColumnName(i));
                System.out.print("        ");
            }
            System.out.println();
            System.out.println("-------------------------------------------------------------------");
            while (resultSet1.next()) {
                for (int i = 1; i <= columnsNumber1; i++) {
                    String columnValue1 = resultSet1.getString(i);
                    System.out.print(columnValue1);
                    System.out.print("     ");
                }
                System.out.println("");
            }
            
            System.out.println("");
            System.out.println("account");
            ResultSet resultSet2 = stmt.executeQuery("SELECT * FROM account");
            ResultSetMetaData rsmd2 = resultSet2.getMetaData();
            int columnsNumber2 = rsmd2.getColumnCount();
            
            for (int i = 1; i <= columnsNumber2; i++) {
                System.out.print(rsmd2.getColumnName(i));
                System.out.print("        ");
            }
            System.out.println();
            System.out.println("-------------------------------------------------------------------");
            while (resultSet2.next()) {
                for (int i = 1; i <= columnsNumber2; i++) {
                    String columnValue2 = resultSet2.getString(i);
                    System.out.print(columnValue2);
                    System.out.print("     ");
                }
                System.out.println("");
            }
            
            System.out.println("");
            System.out.println("owns");
            ResultSet resultSet3 = stmt.executeQuery("SELECT * FROM owns");
            ResultSetMetaData rsmd3 = resultSet3.getMetaData();
            int columnsNumber3 = rsmd3.getColumnCount();
            
            for (int i = 1; i <= columnsNumber3; i++) {
                System.out.print(rsmd3.getColumnName(i));
                System.out.print("        ");
            }
            System.out.println();
            System.out.println("-------------------------------------------------------------------");
            while (resultSet3.next()) {
                for (int i = 1; i <= columnsNumber3; i++) {
                    String columnValue3 = resultSet3.getString(i);
                    System.out.print(columnValue3);
                    System.out.print("     ");
                }
                System.out.println("");
            }

            stmt.close();
            con.close();     
        } catch (SQLException except ) {
            System.out.println ( except.getMessage() );
        }  
    }
}
