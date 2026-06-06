# Model Context Protocol (MCP) Setup Guide

## Overview

Model Context Protocol (MCP) is a system that enables AI-powered development assistance by providing contextual information about your codebase, database, and project structure. This guide explains how MCP is configured and used in the Laraxot framework.

## MCP Configuration

The MCP system is configured in the `mcp.json` file located in the Laravel root directory:

```json
{
  "mcpServers": {
    "mysql": {
      "command": "npx",
      "args": [
        "-y",
        "@modelcontextprotocol/server-mysql",
---
module: theme
topic: mcp-setup
canonical: ../../../Themes/docs/shared-components/mcp-setup-guide.md
---

See canonical documentation: ../../../Themes/docs/shared-components/mcp-setup-guide.md
