import { TestBed } from '@angular/core/testing';
import { ActivitiesListService } from './activities-list.service';



describe('ActivitiesService', () => {
  let service: ActivitiesListService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ActivitiesListService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
