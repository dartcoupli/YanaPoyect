import { user } from '../../models/user.model';
import { HttpParams,HttpHeaders, HttpClient } from '@angular/common/http';
import { parseHostBindings } from '@angular/compiler';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class MenuBarService {
  static postId: any;

//  .____                 .__          ____ ___            _________                  .__              
//  |    |    ____   ____ |__| ____   |    |   \______    /   _____/ ______________  _|__| ____  ____  
//  |    |   /  _ \ / ___\|  |/    \  |    |   /\____ \   \_____  \_/ __ \_  __ \  \/ /  |/ ___\/ __ \ 
//  |    |__(  <_> ) /_/  >  |   |  \ |    |  / |  |_> >  /        \  ___/|  | \/\   /|  \  \__\  ___/ 
//  |_______ \____/\___  /|__|___|  / |______/  |   __/  /_______  /\___  >__|    \_/ |__|\___  >___  >
//          \/    /_____/         \/            |__|             \/     \/                    \/    \/  

constructor(public http: HttpClient)
{ }

  public options = {"headers": {"Content-Type": "application/json"}, "responseType": "text"}; // #ESPECIFICAMOS QUE RESPONDA EN TEXT, Y LO ENVÍE EN JSON
  public postId: any;
  public objDate = new Date();
  public caducidad = this.objDate.getDate() + " " + "Dec" + " " + (this.objDate.getFullYear() + 1) + " " + "23:59:59 GMT";

  
  getCookie(name: string) {
    let conversion = decodeURIComponent(document.cookie);
    let ca: Array<string> = conversion.split(';');
    let cookieName = name + "=";
    let c: string;

    for (let i: number = 0; i < ca.length; i += 1) {
        if (ca[i].indexOf(name, 0) > -1) {
          console.log(ca[i]);

            // #c = ca[i].substring(cookieName.length +1, ca[i].length);
            // #console.log("valore en bruto:" + ca[i]);                                                           //<==== TESTD
            ca[i] = ca[i].replace(cookieName, '');
            c = ca[i].replace(' ', '');
            // #console.log("valore cookie:" + c);                                                                 //<==== TESTD
            return c;
        }
    }
    return "";
  }


  // #FUENTE: https://aprende-web.net/javascript/js14_1.php

  cookieSave(name: String, value: String, date: String)
  {
    document.cookie = name + "=" + value;
  }


  // #FUENTE: https://stackoverflow.com/questions/37051476/how-do-i-post-json-in-angular-2
  // #https://stackoverflow.com/questions/46408537/angular-httpclient-http-failure-during-parsing

  getUserLogin(usename: string, uspassword: string)
  {  


    // #SERIALIZAMOS

    const params = new HttpParams()       // #.set("Content-Type", "application/json")
      .set("usemail", usename)
      .set("uspassword", uspassword);
    
    const paramsS = params.keys().map(x => ({ [x]: params.get(x) }));
    

    // #CONVERTIMOS A JSON

    // #console.log(JSON.stringify(paramsS));                           //<==== TESTED - COMPROBAR CONVERSIÓN JSON   
                                              
      this.http.post('http://localhost:8080/login', JSON.stringify(paramsS), {"headers": {"Content-Type": "application/json"}, "responseType": "text"}).subscribe(data => {
      this.postId = data;

      this.cookieSave("idNow", data, this.caducidad);      
    });
    
  }

}