#!/usr/bin/make

.PHONY : test
.DEFAULT_GOAL : help
.SHELLFLAGS = -exc

RAND := $(shell echo $$((RANDOM % 1000)) )

# This will output the help for each task. thanks to https://marmelab.com/blog/2016/02/29/auto-documented-makefile.html
help: ## Show this help
	@printf "\033[33m%s:\033[0m\n" 'Available commands'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z0-9_-]+:.*?## / {printf "  \033[32m%-18s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

test: ## Run API test with newman
	docker run --rm postman/newman:alpine run chat-api.postman_collection.json \
		--environment ./chat-dev.postman_environment.json \
		--env-var data_run_num=${RAND} \
		--env-var panel_user_id=admin${RAND} \
		--env-var widget_user_id=customer${RAND} \
		--working-dir ./ \
		--folder "Client API" \
		--folder "Widget API"
