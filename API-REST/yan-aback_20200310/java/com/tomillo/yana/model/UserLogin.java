package com.tomillo.yana.model;

public class UserLogin {
	public String usemail;
	public transient String uspassword;
	
	public String getUsemail() {
		return usemail;
	}
	public void setUsemail(String usemail) {
		this.usemail = usemail;
	}
	public String getUspassword() {
		return uspassword;
	}
	public void setUspassword(String uspassword) {
		this.uspassword = uspassword;
	}
}
