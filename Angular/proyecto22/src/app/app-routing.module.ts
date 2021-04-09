import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes =
[
  { path: 'activities', loadChildren: () => import('./activities/activities.module').then(m => m.ActivitiesModule)
}];

@NgModule
({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule
 { }
