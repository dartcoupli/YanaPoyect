import { TestBed } from '@angular/core/testing';
import { MenuBarService } from './menubar.service';



describe('MenuBarService', () => {
  let service: MenuBarService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(MenuBarService);
  });

  it('should be created', () => {
    expect(MenuBarService).toBeTruthy();
  });
});
