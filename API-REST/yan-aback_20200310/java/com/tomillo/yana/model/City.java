package com.tomillo.yana.model;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

/**
 * @author Awakeboy
 *
 */
@Entity
@Table(name="cities")
public class City
{
	
	/**
	 * Se declara los atributos o propiedades de la clase City.
	 */
	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private int ciid;
	private int cicsid;
	private int cicoid;
	private String ciname;
	private String cislug;
	private double cilatitud;
	private double cilongitud;
	
	/**
	 * Constructor de la clase City que no asigna ningún valor.
	 */
	public City()
	{
		super();
	}
	
	/**
	 * Constructor. Asigna unos valores a City.
	 * @param cicsid  
	 * @param cicoid
	 * @param ciname
	 * @param cislug
	 */
	public City(int cicsid, int cicoid, String ciname, String cislug)
	{
		super();
		this.cicsid = cicsid;
		this.cicoid = cicoid;
		this.ciname = ciname;
		this.cislug = cislug;
	}
	
	public int getCiid() {
		return ciid;
	}
	public void setCiid(int ciid) {
		this.ciid = ciid;
	}
	public int getCicsid() {
		return cicsid;
	}
	public void setCicsid(int cicsid) {
		this.cicsid = cicsid;
	}
	public int getCicoid() {
		return cicoid;
	}
	public void setCicoid(int cicoid) {
		this.cicoid = cicoid;
	}
	public String getCiname() {
		return ciname;
	}
	public void setCiname(String ciname) {
		this.ciname = ciname;
	}
	public String getCislug() {
		return cislug;
	}
	public void setCislug(String cislug) {
		this.cislug = cislug;
	}
	public double getCilatitud() {
		return cilatitud;
	}
	public void setCilatitud(double cilatitud) {
		this.cilatitud = cilatitud;
	}
	public double getCilongitud() {
		return cilongitud;
	}
	public void setCilongitud(double cilongitud) {
		this.cilongitud = cilongitud;
	}
	@Override
	public String toString() {
		return "City [ciid=" + ciid + ", cicsid=" + cicsid + ", cicoid=" + cicoid + ", ciname=" + ciname + ", cislug="
				+ cislug + ", cilatitud=" + cilatitud + ", cilongitud=" + cilongitud + "]";
	}

}
