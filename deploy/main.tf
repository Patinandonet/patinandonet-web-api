terraform {
  backend "gcs" {
    bucket = "patinando-net-int-tfstate"
    prefix = "service-api"
  }
}

/*
** Provider
*/
provider "google-beta" {
  project     = var.project
  region      = var.region
}

variable "project" {
  type = string
}

variable "region" {
  type = string
}

variable "run_service_name" {
  type = string
}

variable "domain_name" {
  type = string
}

variable "image" {
  type = string
}

variable "env_vars" {
  type = list(object(
  {
    name  = string
    value = string
  }
  ))
  default = []
}

resource "google_cloud_run_service" "default" {
  name     = var.run_service_name
  location = var.region
  project = var.project

  metadata {
    namespace = var.project
  }

  template {
    spec {
      containers {
        image = var.image
        dynamic "env" {
          for_each = var.env_vars
          content {
            name  = env.value["name"]
            value = env.value["value"]
          }
        }
        resources {
          requests = {
            cpu = "100m"
            memory = "128Mi"
          }
          limits = {
            cpu = "1000m"
            memory = "512Mi"
          }
        }
      }
      container_concurrency = 20
    }
  }

  traffic {
    percent         = 100
    latest_revision = true
  }
}

resource "google_cloud_run_domain_mapping" "default" {
  name     = var.domain_name
  location = var.region
  project= var.project

  metadata {
    namespace = var.project
  }

  spec {
    route_name = google_cloud_run_service.default.name
  }
}

data "google_iam_policy" "noauth" {
  binding {
    role = "roles/run.invoker"
    members = [
      "serviceAccount:587624933799-compute@developer.gserviceaccount.com",
    ]
  }
}

resource "google_cloud_run_service_iam_policy" "noauth" {
  location    = google_cloud_run_service.default.location
  project     = google_cloud_run_service.default.project
  service     = google_cloud_run_service.default.name

  policy_data = data.google_iam_policy.noauth.policy_data
}
