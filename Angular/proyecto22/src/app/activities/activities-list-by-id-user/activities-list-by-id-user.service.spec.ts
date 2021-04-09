import { TestBed } from '@angular/core/testing';

import { ActivitiesListByIdUserService } from './activities-list-by-id-user.service';

describe('ActivitiesListByIdUserService', () => {
  let service: ActivitiesListByIdUserService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ActivitiesListByIdUserService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
