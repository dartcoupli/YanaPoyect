import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Activity } from 'src/app/models/activity.model';
import { MenuBarService } from 'src/app/toolbar/menubar/menubar.service';

@Injectable({
  providedIn: 'root'
})
export class ActivitiesEditService {
  activity: Activity;
  pass: any;
  constructor(public http: HttpClient, public menubarservice: MenuBarService)
   {
     this.activity = 
     {   
          //acid: 1,
          acusid: "1",
          accrdt: new Date(2005, 1, 4), //<== FORMA DE DECLARAR DATE. new Date("Fri Dec 08 2019 07:44:57")
          acdate: new Date(2005, 1, 4),
          accate: 1,
          actitle: 'prueba',
          acdesc: 'descripcion prueba',
          acpmin:1,
          acpmax: 10,
          acprecio: 10,
          acciid: 1
     };
    }
    
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
     // 'Authorization': 'Basic ' + btoa('pepe:1234')
    })
  };

 // getUserActivities(usid: number) {
    //return this.http.get<Activity[]>('/api/activity/' + usid + '/list', this.httpOptions);

 // }
 //getPass() {
  //return this.http.get<Activity[]>('/api/activity/' + usid + '/list', this.httpOptions);
    //return this.http.get<any>('http://localhost/login.php');
 // }

  //getUserActivities() {
  //return this.http.get<Activity[]>('/api/activity/' + usid + '/list', this.httpOptions);
    //return this.http.get<Activity[]>('http://localhost:8080/activity/1/activities', this.httpOptions);
 // }


  getActivities() {
    return this.activity;
  }

  agregarActivities(activity: Activity) {
    //this.activity.push(activity);
    activity.acusid = this.menubarservice.getCookie("idNow");
    return this.http.post<Activity>('http://localhost:8080/activity/create', activity, {"headers": {"Content-Type": "application/json"}});
    console.log("fff"+ activity);
  }

  numPages() {
    return this.http.get('http://localhost:8080/activity/create', {"responseType": "text"});
  }

  nuevoActivities(): Activity {
    return {
      //acid: 1,
      acusid: "1",
      accrdt:  new Date(), //<== FORMA DE DECLARAR DATE. new Date("Fri Dec 08 2019 07:44:57")
      acdate:  new Date(),
      accate: 1,
      actitle: 'título...',
      acdesc: 'descripción...',
      acpmin:1,
      acpmax: 5,
      acprecio: 0,
      acciid: 1,
    };
  }


}
