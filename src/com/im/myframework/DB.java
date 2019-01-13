package com.im.myframework;

import java.sql.Connection;
import java.sql.DriverManager;

public class DB {
	
	static Connection con;
	
	public static void init(String urlNew, String unNew, String pwNew) {
		url = urlNew;
		un = unNew;
		pw = pwNew;
	}
	
	static String url = "";
	static String un = "";
	static String pw = "";
	
	/*static String url = "jdbc:mysql://localhost:3306/dbcar_sale";*/
	static String driver = "com.mysql.jdbc.Driver";
	
	public static Connection getCon() throws Exception{

		if (con == null) {
			Class.forName(driver);
			con = DriverManager.getConnection(url, "root", "");
		}
		
		return con;
	}
	
	

}
