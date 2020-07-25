Feature: Send application
  Scenario: As a job seeker I want to send my application to a job offer so that I can hope to be recruit
    Given I want to send my application to a job
    When I write and send my application
    Then my application is on pending and recruiter can process it
