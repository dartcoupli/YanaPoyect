import { Injectable } from '@angular/core';
import { Activity } from '../../models/activity.model';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { MenuBarService } from 'src/app/toolbar/menubar/menubar.service';
import { ActivityList } from 'src/app/models/activityList.model';

@Injectable({
  providedIn: 'root'
})
export class ActivitiesListService {
  activity: ActivityList[];
  pass: any;
  constructor
    (
      private http: HttpClient,
      public loginupservice : MenuBarService,
    )
    { }
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
     // 'Authorization': 'Basic ' + btoa('pepe:1234')
    })
  };

 // getUserActivities(usid: number) {
    //return this.http.get<Activity[]>('/api/activity/' + usid + '/list', this.httpOptions);

 // }
 getPass() {
  //return this.http.get<Activity[]>('/api/activity/' + usid + '/list', this.httpOptions);
    return this.http.get<any>('http://localhost/login.php');
  }

  public id: any;

  getUserActivities() {

    console.log("XXxx" + document.getElementById('numId').innerText);
    //return this.http.get<Activity[]>('/api/activity/' + usid + '/list', this.httpOptions);
    return this.http.get<ActivityList[]>('http://localhost:8080/activity/AllActivities', this.httpOptions);
  }
  
}
