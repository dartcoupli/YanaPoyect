package com.tomillo.yana.control;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;


@Controller
public class DebugController {

	@RequestMapping("/debug")
	public String debug() {
		return "debug";
	}
}
