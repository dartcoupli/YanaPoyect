package com.tomillo.yana.dao;

import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import org.hibernate.search.query.dsl.QueryBuilder;
import org.hibernate.search.jpa.FullTextEntityManager;
import org.springframework.stereotype.Repository;
import com.tomillo.yana.model.Activity;

@Repository
public class ActivitySearchDao {
	/**
	 * Métodos de búsqueda para la entidad Usuario utilizando la búsqueda de Hibernate.
	 * La anotación transaccional asegura que las transacciones se abrirán y
	 * cerrado al principio y al final de cada método.
	 */

	  // Spring inyectará el objeto manager entity
	  @PersistenceContext
	  private EntityManager entityManager;
	    
	  /**
	   * Una búsqueda básica de la entidad Actividad. La búsqueda se realiza por coincidencia exacta por
	   * palabras clave en los campos acdesc.
	   * 
	   * @param text Entrada del método search de la clase ActivitySearchDao que recibe una variable tipo
	   * String que será utilizada para la consulta.
	 * @throws InterruptedException 
	   */	
	  
	  public List<Activity> search(String text) throws InterruptedException
	  {	  

		// obtener el manager Entity de texto completo
	    FullTextEntityManager fullTextEntityManager = org.hibernate.search.jpa.Search.getFullTextEntityManager(entityManager);
		fullTextEntityManager.createIndexer().startAndWait();  	    
	    
		// crea la consulta usando Hibernate Search query DSL
       QueryBuilder queryBuilder = 
	        fullTextEntityManager.getSearchFactory()
	        .buildQueryBuilder().forEntity(Activity.class).get();  
	         
       // Se hace una consulta muy básica por palabras clave
	    org.apache.lucene.search.Query query =
	        queryBuilder
	          .keyword()
	          .onFields("acdesc")
	          .matching(text)
	          .createQuery();

	    // Ajusta la consulta de Lucene en un objeto de Hibernate Query
	    org.hibernate.search.jpa.FullTextQuery jpaQuery =
	        fullTextEntityManager.createFullTextQuery(query, Activity.class);

	    // Ejecuta los resultados de búsqueda y devolución (ordenados por relevancia por defecto)
	    @SuppressWarnings("unchecked")
	    List<Activity> results = jpaQuery.getResultList();
	    
	    return results;
	  } // method search

} // class UserSearch
