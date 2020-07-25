Feature: Refuse application
  Scenario: As a recruiter I want to refuse an application that I received so that I can explain to the job seeker that his application was unsuccessful
    Given I want to refuse an application
    When I send the reason of refusal
    Then the job seeker is aware of our decision²
