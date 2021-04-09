import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ActivitiesAddComponent } from './activities-add.component';

describe('ActivitiesAddComponent', () => {
  let component: ActivitiesAddComponent;
  let fixture: ComponentFixture<ActivitiesAddComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ActivitiesAddComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ActivitiesAddComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
