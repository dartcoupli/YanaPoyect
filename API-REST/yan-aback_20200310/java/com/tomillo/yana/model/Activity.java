package com.tomillo.yana.model;

import java.io.Serializable;
import java.sql.Date;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import org.hibernate.search.annotations.Field;
import org.hibernate.search.annotations.Indexed;

//import lombok.Data;

/**
 * @author Model Activity hecho por Carlos Cuellar.
 *
 */

@Entity
//@Data
@Indexed
@Table(name = "activities")
public class Activity implements Serializable
{
	
	/**
	 * Se declara los atributos o propiedades de la clase Activity.
	 */
	private static final long serialVersionUID = 1L;
	
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private int acid;
	private int acusid;
	private Date accrdt;
	private Date acdate;
	private int accate;
	private String actitle;
	
	@Field
	public String getAcdesc() {	return acdesc; }
	public void setAcdesc(String acdesc) {	this.acdesc = acdesc;	}
	private String acdesc;
	
	private int acpmin;
	private int acpmax;
	private float acprecio;
	
	//@ManyToOne
	//@JoinColumn(name="acciid")	
	//private City accity;
	public int acciid;
	
	public Activity() {
		super();
	}
	public Activity(int acid, int acusid, Date accrdt, Date acdate, int accate, String actitle, String acdesc,
			int acpmin, int acpmax, float acprecio, int acciid) {
		super();
		this.acid = acid;
		this.acusid = acusid;
		this.accrdt = accrdt;
		this.acdate = acdate;
		this.accate = accate;
		this.actitle = actitle;
		this.acdesc = acdesc;
		this.acpmin = acpmin;
		this.acpmax = acpmax;
		this.acprecio = acprecio;
		this.acciid = acciid;
	}
	public int getAcid() {
		return acid;
	}
	public void setAcid(int acid) {
		this.acid = acid;
	}
	public int getAcusid() {
		return acusid;
	}
	public void setAcusid(int acusid) {
		this.acusid = acusid;
	}
	public Date getAccrdt() {
		return accrdt;
	}
	public void setAccrdt(Date accrdt) {
		this.accrdt = accrdt;
	}
	public Date getAcdate() {
		return acdate;
	}
	public void setAcdate(Date acdate) {
		this.acdate = acdate;
	}
	public int getAccate() {
		return accate;
	}
	public void setAccate(int accate) {
		this.accate = accate;
	}
	public String getActitle() {
		return actitle;
	}
	public void setActitle(String actitle) {
		this.actitle = actitle;
	}
	public int getAcpmin() {
		return acpmin;
	}
	public void setAcpmin(int acpmin) {
		this.acpmin = acpmin;
	}
	public int getAcpmax() {
		return acpmax;
	}
	public void setAcpmax(int acpmax) {
		this.acpmax = acpmax;
	}
	public float getAcprecio() {
		return acprecio;
	}
	public void setAcprecio(float acprecio) {
		this.acprecio = acprecio;
	}
	public int getAcciid() {
		return acciid;
	}
	public void setAcciid(int acciid) {
		this.acciid = acciid;
	}
	public static long getSerialversionuid() {
		return serialVersionUID;
	}
	@Override
	public String toString() {
		return "Activity [acid=" + acid + ", acusid=" + acusid + ", accrdt=" + accrdt + ", acdate=" + acdate
				+ ", accate=" + accate + ", actitle=" + actitle + ", acdesc=" + acdesc + ", acpmin=" + acpmin
				+ ", acpmax=" + acpmax + ", acprecio=" + acprecio + ", accity=" + acciid + "]";
	}
	
	/**
	 * Constructor de la clase Activity que no asigna ningún valor.
	 */

}
