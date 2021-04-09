import { Component, OnInit, DoCheck } from '@angular/core';
import { ActivitiesEditService } from './activities-edit.service';
import { Activity } from 'src/app/models/activity.model';
import {FormsModule, NgForm} from '@angular/forms';

declare var jQuery:any;
declare var $:any;

@Component({
  selector: 'app-activities-edit',
  templateUrl: './activities-edit.component.html',
  
  styleUrls: ['./activities-edit.component.css']
})

export class ActivitiesEditComponent implements OnInit  {
  activity: Activity;
  title = 'appBootstrap';
  url='../assets/backA.jpg';
  
  model: any;
  

  constructor(private activitieseditservice: ActivitiesEditService) {}
 

  ngOnInit(): void {
    this.activity = this.activitieseditservice.nuevoActivities();

  }

  nuevoActivities(activity: Activity, f: NgForm) {
    if(f.valid == true)
    {
      $('#modalSaved').modal('show');
    }
    this.activitieseditservice.agregarActivities(activity).subscribe((data: any) =>
      { data;
        //console.log("PRUEBA"+ this.activity+data ); // <== TESTED - MUESTRA ACTIVIDAD ENMVIADA.     
      });
      this.activity = this.activitieseditservice.nuevoActivities();
  }


}
