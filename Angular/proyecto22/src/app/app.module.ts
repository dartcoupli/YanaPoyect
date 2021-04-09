import { BrowserModule } from '@angular/platform-browser';
import { NgModule, LOCALE_ID } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ActivitiesModule } from './activities/activities.module';
import { FormsModule } from '@angular/forms';
import { ColorPickerModule } from '@syncfusion/ej2-angular-inputs';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { FooterComponent } from './footer/footer.component';
import { MenubarComponent } from './toolbar/menubar/menubar.component';
import { ToolbarComponent } from './toolbar/toolbar.component';
import { ToolbarModule } from './toolbar/toolbar.module';
import { JwPaginationComponent } from 'jw-angular-pagination';
import { DatePipe, registerLocaleData } from '@angular/common';
import localeEs from '@angular/common/locales/es';
import { FilterPipe } from './toolbar/searchbar/pipes/filter.pipe';


registerLocaleData(localeEs, 'es');
@NgModule({
  declarations: [
    AppComponent,
    FooterComponent
   ],
  imports: [
    ActivitiesModule,
    BrowserModule,
    ColorPickerModule,
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    FontAwesomeModule,
    ToolbarModule
  ],
  exports: [

  ],
  providers: [DatePipe, { provide: LOCALE_ID, useValue: 'es' }],
  bootstrap: [AppComponent]
})
export class AppModule { }
