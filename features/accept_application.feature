Feature: Accept application
  Scenario: As a recruiter I want to accept an application that I received so that I can explain to the job seeker that we want to go farther in the recruitment process
    Given I want to accept an application
    When I send a new message to explain the next step
    Then the job seeker is aware of our decision and we can maybe meet the job seeker
