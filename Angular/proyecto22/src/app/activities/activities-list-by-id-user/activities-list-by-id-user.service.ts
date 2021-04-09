import { Injectable } from '@angular/core';
import { MenubarComponent } from 'src/app/toolbar/menubar/menubar.component';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { MenuBarService } from 'src/app/toolbar/menubar/menubar.service';
import { ActivityList } from 'src/app/models/activityList.model';

@Injectable({
  providedIn: 'root'
})
export class ActivitiesListByIdUserService {
  public idNowFromCookie: String;
  activity: ActivityList[];
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
    })
  };


  constructor(private http: HttpClient, public menubarservice: MenuBarService) { }

  getActivitiesByIdUser()
  {
    this.idNowFromCookie = this.menubarservice.getCookie("idNow");
    console.log("PRUEBA " + this.idNowFromCookie );
    return this.http.get<ActivityList[]>('http://localhost:8080/user/' + this.idNowFromCookie + '/activities', this.httpOptions);
  }

  getDeleteActivitiesByAcciid(ucid: String)
  {
    console.log("PRUEBA " + this.idNowFromCookie );
    return this.http.delete('http://localhost:8080/activity/delete/' + ucid, {"headers": {"Content-Type": "application/json"}, "responseType": "text"});
  }

  updateActivities(activity: ActivityList) {
    //this.activity.push(activity);
    console.log("fffDDDD");
    return this.http.put('http://localhost:8080/activity/update/', activity, {"headers": {"Content-Type": "application/json"}, "responseType": "json"});

  };


}
