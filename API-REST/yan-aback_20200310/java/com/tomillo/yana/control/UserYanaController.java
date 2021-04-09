package com.tomillo.yana.control;

import java.util.List;
import java.util.Optional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import com.google.gson.Gson;
import com.tomillo.yana.dao.UserYanaDao;
import com.tomillo.yana.model.Activity;
import com.tomillo.yana.model.UserLogin;
import com.tomillo.yana.model.UserYana;

@RestController
@CrossOrigin(origins = "*", methods= {RequestMethod.GET,RequestMethod.POST})
public class UserYanaController {
	
	@Autowired 
	UserYanaDao uyd;
	
	/*@PostMapping(value="/login", consumes = MediaType.APPLICATION_JSON_VALUE)
	public String login(@RequestBody String body) {
		System.out.println("Entrando en login..");
		return "login";
	}*/
	
	@PostMapping(value="/login", consumes = MediaType.APPLICATION_JSON_VALUE, produces=MediaType.APPLICATION_JSON_VALUE)
	public int login(@RequestBody String body)
	{
		Gson gson = new Gson();
		
		body = body.replace("[", "");
		body = body.replace("]", "");
		body = body.replace("{", "");
		body = body.replace("}", "");
		body = "{"+ body + "}";
		
		UserYana properties = gson.fromJson(body, UserYana.class);
		//System.out.println(properties.usemail);                                                // <-- TESTED - CONVERSIÓN DE JSON A OBJETO.
		
		@SuppressWarnings("unused")
		UserYana user = uyd.findByUsemail(properties.usemail);
		
		return user.usid;
	}

	@GetMapping(value="/user/{userId}/profile", produces=MediaType.APPLICATION_JSON_VALUE)
	public String userProfile(@PathVariable("userId") int userId) {
		Optional<UserYana> u=uyd.findById(userId);
		Gson g = new Gson();
		return g.toJson(u);
	}
	 
	@GetMapping(value="/user/{userId}/activities",produces=MediaType.APPLICATION_JSON_VALUE)
	public String userActivities(@PathVariable("userId") int userId) {
		List<Activity> actividades=uyd.findAllActivitiesByUsid(userId);
		Gson g = new Gson();
		
		System.out.println(actividades); 
		return g.toJson(actividades);
	}
	
	@PostMapping(value="/user/create",consumes = MediaType.APPLICATION_JSON_VALUE,produces=MediaType.APPLICATION_JSON_VALUE)
	public String userCreate(@RequestBody UserYana ua) {
		System.out.println(ua.toString());
		uyd.save(ua);
		return "{'status':'saved'}";
	}
	
	@DeleteMapping(value="/user/delete",produces=MediaType.APPLICATION_JSON_VALUE)
	public String userDelete(@RequestParam int userId) {
		Optional<UserYana> ua=uyd.findById(userId);
		if(ua!=null) uyd.deleteById(userId);
		return "{'status':'deleted'}";
	}
	
	@PutMapping(value="/user/update",consumes = MediaType.APPLICATION_JSON_VALUE,produces=MediaType.APPLICATION_JSON_VALUE)
	public String userUpdate(@RequestBody UserYana ua) {
		Optional<UserYana> userYana=uyd.findById(ua.getUsid());
		if(userYana!=null) uyd.save(ua);
		return "{'status':'updated'}";
	}
	
	
	@GetMapping("/user/{userId}/ranking")
	public String userRanking() {
		return null;
	}	
}
