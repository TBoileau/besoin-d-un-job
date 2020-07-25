Feature: Register
  Scenario: As a job seeker I want to register so that I look for a new job
    Given I need to register to look for a new job
    When I fill the registration form
    Then I can log in with my new account
  Scenario: As a recruiter I want to register so that I recruit new employees
    Given I need to register to recruit new employees
    When I fill the registration form
    Then I can log in with my new account
