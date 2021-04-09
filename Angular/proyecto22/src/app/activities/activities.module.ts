import { NgModule, LOCALE_ID } from '@angular/core';
import { CommonModule, DatePipe, registerLocaleData } from '@angular/common';

import { ActivitiesRoutingModule } from './activities-routing.module';
import { ActivitiesComponent } from './activities.component';
import { ActivitiesListComponent } from './activities-list/activities-list.component';
import { ActivitiesEditComponent } from './activities-edit/activities-edit.component';
import { ActivitiesAddComponent } from './activities-add/activities-add.component';
//import { HttpClient, HttpHeaders, HttpClientModule } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { Routes, RouterModule } from '@angular/router';
import { BrowserModule } from '@angular/platform-browser';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { ActivitiesEditService } from './activities-edit/activities-edit.service';
import { ActivitiesListService } from './activities-list/activities-list.service';
import { DateValueAccessorModule } from 'angular-date-value-accessor';
import { MenubarComponent } from '../toolbar/menubar/menubar.component';
import { ActivitiesListByIdUserComponent } from './activities-list-by-id-user/activities-list-by-id-user.component';
import { ActivitiesListByIdUserService } from './activities-list-by-id-user/activities-list-by-id-user.service';
import { MenuBarService } from '../toolbar/menubar/menubar.service';
import { AppModule } from '../app.module';
import { ToolbarModule } from '../toolbar/toolbar.module';
import { FilterPipe } from '../toolbar/searchbar/pipes/filter.pipe';
import { SearchbarComponent } from '../toolbar/searchbar/searchbar.component';

//https://blog.johanneshoppe.de/2016/10/angular-2-how-to-use-date-input-controls-with-angular-forms/
//date



@NgModule({
  declarations: [ActivitiesComponent, ActivitiesListComponent, ActivitiesEditComponent, ActivitiesAddComponent, ActivitiesListByIdUserComponent, FilterPipe ],
  imports: [
    CommonModule,
    ActivitiesRoutingModule,
    HttpClientModule,
    FormsModule,
    FontAwesomeModule,
    BrowserModule,
    DateValueAccessorModule,

  ], 
exports: [
  ActivitiesComponent,
  ActivitiesListComponent,
  ActivitiesEditComponent,
  ActivitiesAddComponent,
  ActivitiesListByIdUserComponent
],
providers: [
  ActivitiesListService,
  ActivitiesEditService,
  ActivitiesListByIdUserService,

],
bootstrap: [ActivitiesComponent]
})
export class ActivitiesModule { }
