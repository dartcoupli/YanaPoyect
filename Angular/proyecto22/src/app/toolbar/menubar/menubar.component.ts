import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { stringify } from 'querystring';
import { MenuBarService } from './menubar.service';


@Component({
  selector: 'app-menubar',
  templateUrl: './menubar.component.html',
  styleUrls: ['./menubar.component.css']
})
export class MenubarComponent implements OnInit {
  Links = [
    {
      txt: 'ACTIVIDADES',
      href: 'http://localhost/index.php#portfolio'
    },
    {
      txt: 'SOBRE NOSOTROS',
      href: 'http://localhost/index.php#about'
    },
    {
      txt: 'CONTACTO',
      href: '#'
    },
    {
      txt: 'MOSTRAR TODAS LAS ACTIVIDADES',
      href: '/listado'
    },
    {
      txt: 'CREAR ACTIVIDAD',
      href: '/edit'
    },
    {
      txt: 'ACTIVIDADES PROPIAS',
      href: '/listadoDelUser'
    },
    ]

  
//  .____                 .__          ____ ___         _________                                                    __   
//  |    |    ____   ____ |__| ____   |    |   \_____   \_   ___ \  ____   _____ ______   ____   ____   ____   _____/  |_ 
//  |    |   /  _ \ / ___\|  |/    \  |    |   |____ \  /    \  \/ /  _ \ /     \\____ \ /  _ \ /    \_/ __ \ /    \   __\
//  |    |__(  <_> ) /_/  >  |   |  \ |    |  /|  |_> > \     \___(  <_> )  Y Y  \  |_> >  <_> )   |  \  ___/|   |  \  |  
//  |_______ \____/\___  /|__|___|  / |______/ |   __/   \______  /\____/|__|_|  /   __/ \____/|___|  /\___  >___|  /__|  
//          \/    /_____/         \/           |__|             \/             \/|__|               \/     \/     \/      
  
  public idNowLogin: any;
  
  constructor(public loginupservice : MenuBarService, public http: HttpClient)
  {
    //console.log("IDdddddd "+this.loginupservice.postId);
  }

  //public idNowLogin: any;

  ngOnInit(): void
  { 
    this.idNowLogin = this.loginupservice.getUserLogin(this.getCookie("yana_user_cookie"), this.getCookie('yana_password_cookie'))
    // ## console.log("ID "+this.idNowLogin);
  }


  // ## DESCODIFICACIÓN, FUENTES: http://js.dokry.com/cmo-lidiar-con-urls-no-codificadas-utf-8-en-express.html
  
  getCookie(name: string) {
    let conversion = decodeURIComponent(document.cookie);
    let ca: Array<string> = conversion.split(';');
    let cookieName = name + "=";
    let c: string;

    for (let i: number = 0; i < ca.length; i += 1) {
        if (ca[i].indexOf(name, 0) > -1) {
          console.log(ca[i]);

            // ## c = ca[i].substring(cookieName.length +1, ca[i].length);
            // ## console.log("valore en bruto:" + ca[i]);                                                           //<==== TESTD
            ca[i] = ca[i].replace(cookieName, '');
            c = ca[i].replace(' ', '');
            // ## console.log("valore cookie:" + c);                                                                 //<==== TESTD
            return c;
        }
    }
    return "";
  }
}
