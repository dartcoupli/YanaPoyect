package com.tomillo.yana.dao;

import java.util.List;

import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;
import com.tomillo.yana.model.Activity;

@Repository
public interface ActivityDao extends CrudRepository<Activity, Integer> {
	
	@Query("Select u FROM Activity u WHERE acid=:id")
	public List<Activity> findAllActivitiesByUsid(@Param("id") int acid);

	@Query("Select u FROM Activity u")
	public List<Activity> selectAllActivities();
	
	@Modifying
	@Query("Delete FROM Activity WHERE acid=:id")
	public int deleteActivities(@Param("id") int acid);
	
	@Query("Select count(*) FROM Activity u")
	public int sendNumPages();
}
