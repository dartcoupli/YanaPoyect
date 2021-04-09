package com.tomillo.yana.security;

import javax.sql.DataSource;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;

@Configuration
@EnableWebSecurity
public class SecurityConfig extends WebSecurityConfigurerAdapter {

	@Override
	protected void configure(HttpSecurity http) throws Exception {
		http.csrf().disable().authorizeRequests()
			.antMatchers("/debug").permitAll()
			.antMatchers("/user/**").permitAll()
			.antMatchers("/login").permitAll()
			.antMatchers("/activity/**").permitAll()
			.antMatchers("/search/**").permitAll()			
			//.antMatchers("/activity/**").hasRole("USER")
			.anyRequest().authenticated()
			.and().formLogin().disable().httpBasic();
	}
	
	@Autowired
	private DataSource dataSource;

	@Autowired
	protected void configureGlobal(AuthenticationManagerBuilder auth) throws Exception {
		//PasswordEncoder encoder = PasswordEncoderFactories.createDelegatingPasswordEncoder();
		auth.jdbcAuthentication().dataSource(dataSource)
			.usersByUsernameQuery("select username, password, enabled from admins where username=?")
			.authoritiesByUsernameQuery("select username, role from admins where username=?");
			//.passwordEncoder(encoder);
	}
}