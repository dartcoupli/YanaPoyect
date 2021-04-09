import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ActivitiesListByIdUserComponent } from './activities-list-by-id-user.component';

describe('ActivitiesListByIdUserComponent', () => {
  let component: ActivitiesListByIdUserComponent;
  let fixture: ComponentFixture<ActivitiesListByIdUserComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ActivitiesListByIdUserComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ActivitiesListByIdUserComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
