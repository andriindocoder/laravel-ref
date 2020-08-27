import { TestBed } from '@angular/core/testing';

import { AsuLoginService } from './asu-login.service';

describe('AsuLoginService', () => {
  let service: AsuLoginService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(AsuLoginService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
