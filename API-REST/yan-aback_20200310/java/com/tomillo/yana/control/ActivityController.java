package com.tomillo.yana.control;

import java.util.List;
import java.util.Optional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import com.google.gson.Gson;
import com.tomillo.yana.dao.ActivityDao;
import com.tomillo.yana.dao.ActivitySearchDao;
import com.tomillo.yana.model.Activity;
import com.tomillo.yana.model.UserYana;

import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.transaction.annotation.Transactional;

/**
 * @author Carlos Cuellar y Awakeboy
 *
 */
@RestController
@CrossOrigin(origins = "*", methods= {RequestMethod.GET,RequestMethod.POST})
public class ActivityController {
	
	/**
	 * Inyecta @Autowired la clase ActivitySearchDao y crea una instacia llamada ActSearch.
	 */
	@Autowired
	private ActivitySearchDao ActSearch;
	
	/**
	 * Inyecta @Autowired la clase ActivityDao y crea una instacia llamada act. 
	 */
	@Autowired
	ActivityDao act;

	  /**
	 * @param works Con la anotación @PathVariable("works") el parámetro pasado por REST, devuelve una palabra
	 * o conjunto de palabras que se guarda en works.
	 * @param model Sirve para inyectar a través de model en una web, el valor de la variable, clave valor, donde se solicite.
	 * @return
	 */
	@RequestMapping(value = "/search/{works}", method = RequestMethod.GET)
	  public List<Activity> search(@PathVariable("works") String works, Model model)
	  	{
			List<Activity> searchResults = null;
	    try
	    {	
	    	System.out.println("Ha sido un éxitos --> " + ActSearch.search(works));
		    searchResults = ActSearch.search(works);
	    }
	    catch (Exception ex) {
	      // here you should handle unexpected errors
	      // ...
	      // throw ex;
	    	System.out.println("Se ha producido un error");
	    }
	    	
	    	model.addAttribute("searchResults", searchResults);
	    	System.out.println(searchResults);
	    	
	    return searchResults;
	  }


	
//	  ____                    _                   _     _                     __  __          _                 _           _         
//	 |  _ \    __ _    __ _  (_)  _ __     __ _  | |_  (_)   ___    _ __     |  \/  |   ___  | |_    __ _    __| |   __ _  | |_   ___ 
//	 | |_) |  / _` |  / _` | | | | '_ \   / _` | | __| | |  / _ \  | '_ \    | |\/| |  / _ \ | __|  / _` |  / _` |  / _` | | __| / __|
//	 |  __/  | (_| | | (_| | | | | | | | | (_| | | |_  | | | (_) | | | | |   | |  | | |  __/ | |_  | (_| | | (_| | | (_| | | |_  \__ \
//	 |_|      \__,_|  \__, | |_| |_| |_|  \__,_|  \__| |_|  \___/  |_| |_|   |_|  |_|  \___|  \__|  \__,_|  \__,_|  \__,_|  \__| |___/
//	                  |___/                                                                                                           
	
	@GetMapping(value="/activity/NumPages", produces = MediaType.APPLICATION_JSON_VALUE)
	public int sendNumPages() {
		int numPages = act.sendNumPages();
		
		if(numPages%4 !=0)
		{
			numPages /=4;
			numPages +=1;
		}
		else
		{
			numPages /=4;
		}
		
		return numPages;
	}
	
//END	
	
	
//	   ____    _                               _      _   _        _             _     _           _   _     _              
//	  / ___|  | |__     ___   __      __      / \    | | | |      / \      ___  | |_  (_) __   __ (_) | |_  (_)   ___   ___ 
//	  \___ \  | '_ \   / _ \  \ \ /\ / /     / _ \   | | | |     / _ \    / __| | __| | | \ \ / / | | | __| | |  / _ \ / __|
//	   ___) | | | | | | (_) |  \ V  V /     / ___ \  | | | |    / ___ \  | (__  | |_  | |  \ V /  | | | |_  | | |  __/ \__ \
//	  |____/  |_| |_|  \___/    \_/\_/     /_/   \_\ |_| |_|   /_/   \_\  \___|  \__| |_|   \_/   |_|  \__| |_|  \___| |___/
	
	@GetMapping(value="/activity/AllActivities", produces = MediaType.APPLICATION_JSON_VALUE)
	public String selectAllActivities() {
		List<Activity> u= act.selectAllActivities();
		Gson g = new Gson();
		return g.toJson(u);
	}
	
//END
	

//	  ____                               _        _             _     _           _   _     _              
//	 / ___|    __ _  __   __   ___    __| |      / \      ___  | |_  (_) __   __ (_) | |_  (_)   ___   ___ 
//	 \___ \   / _` | \ \ / /  / _ \  / _` |     / _ \    / __| | __| | | \ \ / / | | | __| | |  / _ \ / __|
//	  ___) | | (_| |  \ V /  |  __/ | (_| |    / ___ \  | (__  | |_  | |  \ V /  | | | |_  | | |  __/ \__ \
//	 |____/   \__,_|   \_/    \___|  \__,_|   /_/   \_\  \___|  \__| |_|   \_/   |_|  \__| |_|  \___| |___/
	                                                                                                       
	@PostMapping(value="/activity/create",consumes = MediaType.APPLICATION_JSON_VALUE,produces=MediaType.APPLICATION_JSON_VALUE)
	public String userCreate(@RequestBody Activity ac) {
		
		System.out.println(ac.toString());
		act.save(ac);
		return "{'status':'saved'}";
	}

// END
	
	
	
	@GetMapping(value="/activity/{activityId}/profile", produces=MediaType.APPLICATION_JSON_VALUE)
	public String userProfile(@PathVariable("activityId") int activityId) {
		Optional<Activity> u=act.findById(activityId);
		Gson g = new Gson();
		return g.toJson(u);
	}
	
	@GetMapping(value="/activity/{activityId}/activities",produces=MediaType.APPLICATION_JSON_VALUE)
	public String userActivities(@PathVariable("activityId") int activityId) {
		List<Activity> actividades=act.findAllActivitiesByUsid(activityId);
		Gson g = new Gson();

		BCryptPasswordEncoder b = new BCryptPasswordEncoder();
		System.out.println("HOLITA" + b.matches("2d6d", "$2y$15$mwTKfF0wzdLYq8LyN3MM8eNfurGwsAX5FTHiRdaqTIn5Plx9hNiiW"));
		return g.toJson(actividades);
	}

//     ____           _          _                     _             _                 _   _     _           
//	  |  _ \    ___  | |   ___  | |_    ___           / \      ___  | |_  (_) __   __ (_) | |_  (_)   ___   ___ 
//	  | | | |  / _ \ | |  / _ \ | __|  / _ \         / _ \    / __| | __| | | \ \ / / | | | __| | |  / _ \ / __|
//	  | |_| | |  __/ | | |  __/ | |_  |  __/  		/ ___ \  | (__  | |_  | |  \ V /  | | | |_  | | |  __/ \__ \
//	  |____/   \___| |_|  \___|  \__|  \___|       /_/   \_\  \___|  \__| |_|   \_/   |_|  \__| |_|  \___| |___/
//	                                                                                                                
	@Transactional   
	@DeleteMapping(value = "/activity/delete/{acid}", produces=MediaType.APPLICATION_JSON_VALUE)
	public String deleteActivities(@PathVariable("acid") int acid) {//@RequestParam
		System.out.print("Hola");
		int da = act.deleteActivities(acid);

		//if(ac!=null) act.deleteById(activityId);
		return "{'status':'deleted'}";
	}
	
	
// END
	
	
	@PutMapping(value="/activity/update",consumes = MediaType.APPLICATION_JSON_VALUE,produces=MediaType.APPLICATION_JSON_VALUE)
	public String userUpdate(@RequestBody Activity ac) {
		//Optional<Activity> userYana=act.findById(ac.getAcid());
		//if(userYana!=null) act.save(ac);
		System.out.print(ac);
		
		act.save(ac);
		return "{'status':'updated'}";
	}
	
	@GetMapping("/activity/{userId}/ranking")
	public String userRanking() {
		return null;
	}
}
