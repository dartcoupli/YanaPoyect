import { Component, OnInit  } from '@angular/core';
import { ActivitiesListByIdUserService } from './activities-list-by-id-user.service';
import { faUsers,faTrash, faEdit } from '@fortawesome/free-solid-svg-icons';
import { HttpClient } from '@angular/common/http';
import { ActivitiesRoutingModule } from '../activities-routing.module';
import { ActivityList } from 'src/app/models/activityList.model';
import { NgForm, FormBuilder } from '@angular/forms';
import { DatePipe } from '@angular/common';

declare var jQuery:any;
declare var $:any;

@Component({
  selector: 'app-activities-list-by-id-user',
  templateUrl: './activities-list-by-id-user.component.html',
  styleUrls: ['./activities-list-by-id-user.component.css']
})

export class ActivitiesListByIdUserComponent implements OnInit {
  searchByTitle = false;
  
  faUsers = faUsers;
  faTrash = faTrash;
  faEdit = faEdit;
  PasswordVerify: any;
  userimage = '../assets/prototype.jpg';
  linkBack = '../assets/background-color:backgroundCard.gif';
  activity: ActivityList;
  activityComponent: ActivityList[];

  fecha: String[];
  fechaString: String;

  fechaCreation: String[];
  fechaStringCreation: String;


  constructor
  (
    public datePipe: DatePipe,
    public activitieslistbyiduserservice: ActivitiesListByIdUserService,
    public http: HttpClient, public rutas: ActivitiesRoutingModule
  )
  {

  }; //## public menubarcomponent : MenubarComponent

  ngOnInit(): void
  {
    this.activitieslistbyiduserservice.getActivitiesByIdUser().subscribe(
      (response) => {   
        
        this.activitieslistbyiduserservice.activity = response;

//        ________ ___.        __               __    ________          __           _________                                   __  .__               
//        \_____  \\_ |__     |__| ____   _____/  |_  \______ \ _____ _/  |_  ____   \_   ___ \  ____   _______  __ ____________/  |_|__| ____   ____  
//         /   |   \| __ \    |  |/ __ \_/ ___\   __\  |    |  \\__  \\   __\/ __ \  /    \  \/ /  _ \ /    \  \/ // __ \_  __ \   __\  |/  _ \ /    \ 
//        /    |    \ \_\ \   |  \  ___/\  \___|  |    |    `   \/ __ \|  | \  ___/  \     \___(  <_> )   |  \   /\  ___/|  | \/|  | |  (  <_> )   |  \
//        \_______  /___  /\__|  |\___  >\___  >__|   /_______  (____  /__|  \___  >  \______  /\____/|___|  /\_/  \___  >__|   |__| |__|\____/|___|  /
//                \/    \/\______|    \/     \/               \/     \/          \/          \/            \/          \/                           \/ 
//  

        for (let elemento of this.activitieslistbyiduserservice.activity)
        {
          this.fecha = elemento.acdate.toString().split(" ");

          if(this.fecha[0] == 'ene.')
          {
            this.fecha[0] = '01';
          }
          else if(this.fecha[0] == 'feb.')
          {
            this.fecha[0] = '02';
          }
          else if(this.fecha[0] == 'mar.')
          {
            this.fecha[0] = '03';
          }
          else if(this.fecha[0] == 'abr.')
          {
            this.fecha[0] = '04';
          }
          else if(this.fecha[0] == 'may.')
          {
            this.fecha[0] = '05';
          }
          else if(this.fecha[0] == 'jun.')
          {
            this.fecha[0] = '06';
          }
          else if(this.fecha[0] == 'jul.')
          {
            this.fecha[0] = '07';
          }
          else if(this.fecha[0] == 'ago.')
          {
            this.fecha[0] = '08';
          }
          else if(this.fecha[0] == 'sep.')
          {
            this.fecha[0] = '09';
          }
          else if(this.fecha[0] == 'oct.')
          {
            this.fecha[0] = '10';
          }
          else if(this.fecha[0] == 'nov.')
          {
            this.fecha[0] = '11';
          }
          else if(this.fecha[0] == 'div.')
          {
            this.fecha[0] = '12';
          }

          this.fechaString = this.fecha[2] + "-" + this.fecha[0] + "-" + this.fecha[1];
          this.fechaString = this.fechaString.replace(",","");
          //console.log("DDXX" + this.fechaString.toString());
          elemento.acdate = new Date(this.fechaString.toString());
        }

        //## CÓDIGO ANTIGUO, NO EN USO, PARA PROBAR CóDIGO.
        //response[1].accrdt = new Date('yyyy-MM-dd');
        //response[1].accrdt = new Date('1111-11-11');  
        //## console.log("ARRAY "+  this.activitieslistbyiduserservice.activity); //<-- TESTED - COMPROBAMOS QUE ENVÍA DATOS A LA VISTA.

      },
      (error) => {
        console.error(error);
      }
    );
  };

  deleteActivitySeleted(acid: String)
  {
  this.activitieslistbyiduserservice.getDeleteActivitiesByAcciid(acid).subscribe(
    (response: any) => {

      this.ngOnInit();
      console.log(response);
    }),
    (err: any) => {
      console.log("Error");
    }
  };

  updateActivities(activity: ActivityList, f: NgForm) {
    if(f.valid == true)
    { 
      //## MUESTRA MODAL, Y CARGA LOS DATOS DE LA ACTIVIDAD SELECIONADA.
      $('#updateModal'+activity.acid).modal('hide');
      //## MUESTRA MENSAJE MEDIANTE VENTANA MODAL _ ACTUALIZADO CON ÉXITO.
      $('#exampleModalUpdate').modal('show');
      this.ngOnInit;
    };
    //## DATEPIPE TRANFORSM this.datepipe.transform(activity.accrdt, 'yyyy-MM-dd')
    //console.log(new Date(12/2/2212).toISOString()+"AHORA");


    this.fechaCreation = activity.accrdt.toString().split(" ");

    if(this.fechaCreation[0] == 'ene.')
    {
      this.fechaCreation[0] = '01';
    }
    else if(this.fechaCreation[0] == 'feb.')
    {
      this.fechaCreation[0] = '02';
    }
    else if(this.fechaCreation[0] == 'mar.')
    {
      this.fechaCreation[0] = '03';
    }
    else if(this.fechaCreation[0] == 'abr.')
    {
      this.fechaCreation[0] = '04';
    }
    else if(this.fechaCreation[0] == 'may.')
    {
      this.fechaCreation[0] = '05';
    }
    else if(this.fechaCreation[0] == 'jun.')
    {
      this.fechaCreation[0] = '06';
    }
    else if(this.fechaCreation[0] == 'jul.')
    {
      this.fechaCreation[0] = '07';
    }
    else if(this.fechaCreation[0] == 'ago.')
    {
      this.fechaCreation[0] = '08';
    }
    else if(this.fechaCreation[0] == 'sep.')
    {
      this.fechaCreation[0] = '09';
    }
    else if(this.fechaCreation[0] == 'oct.')
    {
      this.fechaCreation[0] = '10';
    }
    else if(this.fechaCreation[0] == 'nov.')
    {
      this.fechaCreation[0] = '11';
    }
    else if(this.fechaCreation[0] == 'div.')
    {
      this.fechaCreation[0] = '12';
    }

    this.fechaStringCreation = this.fechaCreation[2] + "-" + this.fechaCreation[0] + "-" + this.fechaCreation[1];
    this.fechaStringCreation = this.fechaStringCreation.replace(",","");
    //## console.log("DDXX" + this.fechaString.toString());
    activity.accrdt = new Date(this.fechaStringCreation.toString());


    //## activity.accrdt = this.datePipe.transform(activity.accrdt , 'dd.mm.yy');
    this.activitieslistbyiduserservice.updateActivities(activity).subscribe((data: any) =>
      { data;
        //## console.log("PRUEBA"); // <== TESTED - MUESTRA ACTIVIDAD ENMVIADA.     
      });
        //## console.log("PRUEBA SI");
  }

}
