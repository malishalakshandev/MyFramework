package com.im.myframework;

import java.lang.reflect.Field;
import java.lang.reflect.Method;
import java.sql.Connection;
import java.sql.PreparedStatement;

import javax.xml.bind.DataBindingException;

public class CommonController {

	public static boolean insert(Object obj) {
		// Rules :
		// class name and database table name must be same
		// table column names and model methods name must be same
		// cannot send empty object,it  must have values
		
		String tableName = "";
		String columnNames = "";
		String valueSet = "";
		
		Class cls = obj.getClass(); //get class
		tableName = cls.getSimpleName().toLowerCase(); //get class name & convert to lowercase
		
		Method[] methods = cls.getDeclaredMethods(); // get declared methods names  of Student Model
		
		for(Method method : methods) {

			if (method.getName().startsWith("get")) { // get Only getters
			
				columnNames += method.getName().toLowerCase().replace("get", "")+",";
				
				try {
					
					valueSet +=	"'" + method.invoke(obj, null) + "',";   // get methods
					
				} catch (Exception e) {
					e.printStackTrace();
				}
				
			}
			 
		}
		
/*		"smiles".substring(1, 5);
		-> s-0, m-1, i-2, l-3, e-4, s-5
		-> substring count starts with 0 for both start and end parameter
		-> in substring(1) - get -> 1st index - m to
		-> then substring(5) - get 0 to 5 and minus 1  -> 4th index e
		-> so its returns index from 1 to 4 -> smile
*/		
		columnNames = columnNames.substring(0, columnNames.length() -1);  
		valueSet = valueSet.substring(0, valueSet.length() -1);
		
		String sql = "INSERT INTO " + tableName + "(" + columnNames + ") VALUES (" + valueSet + ")" ;
		System.out.println(sql);
		
			
		try {
			
			Connection con = DB.getCon();
			PreparedStatement ps = con.prepareStatement(sql);
			
			int rows = ps.executeUpdate();
			if(rows>0) {
				return true;
			}else {
				return false;
			}
	
		} catch (Exception e) {
			e.printStackTrace();
			return false;
		}
		
	}
	
	
	
	
}
