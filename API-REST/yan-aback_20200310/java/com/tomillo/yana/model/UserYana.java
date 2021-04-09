package com.tomillo.yana.model;

import java.io.Serializable;
import java.sql.Date;
import java.util.List;
import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import org.hibernate.annotations.Formula;


@Entity
@Table(name="users")
public class UserYana implements Serializable{

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	public int usid;
	private String usname;
	private String ussurname;
	@Formula(value = " concat(usname, ' ', ussurname) ")
	private String usfullname;
	public String usalias;
	public String usemail;
	public transient String uspassword;
	private String usphone;
	private Date usdborn; //valor por defecto en bd: 0000-00-00
	private boolean usactive; //valor por defecto en bd: false
	private Date usfalta; //valor por defecto, la fecha actual
	private String usavatar; //valor por defecto en bd: avatar_hombre.png
	private String ustoken;
	@ManyToOne
	@JoinColumn(name="usciid")
	private City uscity;//FK de la ciudad (int)
	//private int usciid; 
	
    @OneToMany(mappedBy="acusid",cascade= CascadeType.ALL)
    private List<Activity> usactividades;
	
	
	public UserYana() {
		super();
		// TODO Auto-generated constructor stub
	}
	public UserYana(String usname, String usemail, String uspassword) {
		super();
		this.usname = usname;
		this.usemail = usemail;
		this.uspassword = uspassword;
	}
	
	public int getUsid() {
		return usid;
	}
	public void setUsid(int usid) {
		this.usid = usid;
	}
	public String getUsname() {
		return usname;
	}
	public void setUsname(String usname) {
		this.usname = usname;
	}
	public String getUssurname() {
		return ussurname;
	}
	public void setUssurname(String ussurname) {
		this.ussurname = ussurname;
	}
	public String getUsfullname() {
		return usfullname;
	}
	public void setUsfullname(String usfullname) {
		this.usfullname = usfullname;
	}
	public String getUsalias() {
		return usalias;
	}
	public void setUsalias(String usalias) {
		this.usalias = usalias;
	}
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
	public String getUsphone() {
		return usphone;
	}
	public void setUsphone(String usphone) {
		this.usphone = usphone;
	}
	public Date getUsdborn() {
		return usdborn;
	}
	public void setUsdborn(Date usdborn) {
		this.usdborn = usdborn;
	}
	public boolean isUsactive() {
		return usactive;
	}
	public void setUsactive(boolean usactive) {
		this.usactive = usactive;
	}
	public Date getUsfalta() {
		return usfalta;
	}
	public void setUsfalta(Date usfalta) {
		this.usfalta = usfalta;
	}
	public String getUsavatar() {
		return usavatar;
	}
	public void setUsavatar(String usavatar) {
		this.usavatar = usavatar;
	}
	public String getUstoken() {
		return ustoken;
	}
	public void setUstoken(String ustoken) {
		this.ustoken = ustoken;
	}
	public City getUscity() {
		return uscity;
	}
	public void setUscity(City uscity) {
		this.uscity = uscity;
	}
	public List<Activity> getUsactividades() {
		return usactividades;
	}
	public void setUsactividades(List<Activity> usactividades) {
		this.usactividades = usactividades;
	}
	@Override
	public String toString() {
		return "UserYana [usid=" + usid + ", usname=" + usname + ", ussurname=" + ussurname + ", usfullname="
				+ usfullname + ", usalias=" + usalias + ", usemail=" + usemail + ", usphone=" + usphone + ", usdborn="
				+ usdborn + ", usactive=" + usactive + ", usfalta=" + usfalta + ", usavatar=" + usavatar + ", ustoken="
				+ ustoken + ", uscity=" + uscity + ", usactividades=" + usactividades + "]";
	}


	
}
