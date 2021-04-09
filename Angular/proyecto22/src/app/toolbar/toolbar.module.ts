import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MenubarComponent } from './menubar/menubar.component';
import { ToolbarComponent } from './toolbar.component';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { BrowserModule } from '@angular/platform-browser';
import { DateValueAccessorModule } from 'angular-date-value-accessor';
import { MenuBarService } from './menubar/menubar.service';
import { ActivitiesModule } from '../activities/activities.module';
import { SearchbarComponent } from './searchbar/searchbar.component';



@NgModule({
  declarations: [MenubarComponent, ToolbarComponent, SearchbarComponent], //CAMBIO
  imports: [
    CommonModule,
    HttpClientModule,
    FormsModule,
    FontAwesomeModule,
    BrowserModule,
    DateValueAccessorModule,
    ActivitiesModule
  ], 
  exports:[
    MenubarComponent,
    ToolbarComponent,
    SearchbarComponent
  ],
  providers: [
    MenuBarService
  ],
})
export class ToolbarModule { }
