import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ActivitiesComponent } from './activities.component';
import { ActivitiesListComponent } from './activities-list/activities-list.component';
import { ActivitiesEditComponent } from './activities-edit/activities-edit.component';
import { ActivitiesListByIdUserComponent } from './activities-list-by-id-user/activities-list-by-id-user.component';
import { JwPaginationComponent } from 'jw-angular-pagination';

const rutas: Routes = [
  { path: '', component: ActivitiesComponent },
  { path: 'edit', component: ActivitiesEditComponent },
  { path: 'listado', component: ActivitiesListComponent },
  { path: 'listadoDelUser', component: ActivitiesListByIdUserComponent }
];

@NgModule({
  imports: [RouterModule.forChild(rutas)],
  exports: [RouterModule]
})
export class ActivitiesRoutingModule { }
