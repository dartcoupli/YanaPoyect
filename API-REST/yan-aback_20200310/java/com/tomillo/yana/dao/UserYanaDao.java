package com.tomillo.yana.dao;

import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import com.tomillo.yana.model.Activity;
import com.tomillo.yana.model.UserYana;

/**
 * @author Awekeboy
 *
 */

@Repository
public interface UserYanaDao extends CrudRepository<UserYana, Integer> {
	
	/**
	 * Busca por e-mail (tiene que coincidir exacto)
	 * @param email Pasamos como parámetro de UserYana el parámetro email, para buscar usuario por el mail.
	 * @return
	 */
	
	public UserYana findByUsemail(String email);
	
	/* Buscar por nombre completo (puede coincidir solo algunos chars).
	 * @param name
	 * @return
	 */
	@Query("Select u FROM UserYana u WHERE u.usfullname LIKE CONCAT('%',:name,'%')")
	public List<UserYana> findByPartOfFullname(@Param("name") String name);
	
	/**
	 * @param usid 
	 * @return
	 */
	@Query("Select usactividades FROM UserYana u WHERE usid = :id")
	public List<Activity> findAllActivitiesByUsid(@Param("id") int usid);
}
