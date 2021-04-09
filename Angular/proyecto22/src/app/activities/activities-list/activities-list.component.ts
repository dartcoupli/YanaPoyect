import { Component, OnInit, Input } from '@angular/core';
import { faUsers } from '@fortawesome/free-solid-svg-icons';
import { ActivitiesListService } from './activities-list.service';
import { HttpClient } from '@angular/common/http';
import { MenuBarService } from 'src/app/toolbar/menubar/menubar.service';
import {FormsModule} from '@angular/forms'


declare var jQuery:any;
declare var $:any;

@Component({
  selector: 'app-activities-list',
  templateUrl: './activities-list.component.html',
  styleUrls: ['./activities-list.component.css']
})
export class ActivitiesListComponent implements OnInit {
  seleccionado = '';
  searchByText = '';
  searchByDescription = false;
  searchByTitle = true;
itemAccate='';
selectedCategory='Mostrar todos';
  /*if (searchByTitle = true) 
  {
    $('#exampleModalAvised').modal('show');
  };*/

  faUsers = faUsers;                                                                          //BOOTSTRAP ICON
  PasswordVerify: any;
  public idEditNowFromCookie: String;
  userimage = '../assets/prototype.jpg';
  linkBack = '../assets/background-color:backgroundCard.gif';

  accateList = [
    "Mostrar todos",
    "Naturaleza",
    "Gastronomía",
    "Deporte",
    "Cultura"
  ];

  acdateList: [];
  inscriptionList: [];
  acprecioList: [];

  constructor
    (
      public activitieslistservice: ActivitiesListService,
      public http: HttpClient,
      public menubarservice: MenuBarService
    )
    {  }

  //getUserActivit(usid: number){
    //this.data.getUserActivities(usid).subscribe((response) => {
   // this.inmu = response["data"];
  //  });
  //}

  ngOnInit() {
//    this.getUserActivit(1);
    this.activitieslistservice.getUserActivities().subscribe(
      (response) => {
        this.activitieslistservice.activity = response;
        console.log("ARRAY "+  this.activitieslistservice.activity);
      },
      (error) => {
        console.error(error);
      }
    );
    this.idEditNowFromCookie =  this.menubarservice.getCookie("idNow");                         //ID DEL USER ACTUAL.
  }


}
