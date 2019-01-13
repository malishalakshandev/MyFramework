package com.im.demo;

import com.im.myframework.CommonController;

public class Demo {

	public static void main(String[] args) {
		
		Student std = new Student();
		
		std.setId(1);
		std.setName("Kamal");
		std.setAge(12);
		std.setAddress("Negombo");
		std.setEmail("kamal@gmail.com");
		std.setTp("0774512320");
		
		CommonController.insert(std);
		
	}
	
}
