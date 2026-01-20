# 🤖 AI Module - Intelligence Integration

## 📋 Overview
The **AI** module provides integration with artificial intelligence services, including LLMs, chatbots, and automated content generation.

## 🎯 Features
- 🤖 **LLM Integration**: Support for OpenAI, Gemini, Claude, etc.
- 💬 **Chatbots**: Conversational interfaces for users.
- 📝 **Content Generation**: Automated text and content creation.
- 🧠 **Context Awareness**: RAG (Retrieval-Augmented Generation) capabilities.

## 🏗️ Architecture
- **Services**: AI service providers and adapters.
- **Models**: AI-related data models (Prompts, Conversations, etc.).
- **Filament**: Admin interface for AI configuration and usage.
- **Utility Scripts**: `bashscripts/ai/ai_init.sh` for automating environment setup and symlink management.

## 🛠️ Tooling & Automation
### AI Initializer (`ai_init.sh`)
The `bashscripts/ai/ai_init.sh` script is a core utility designed to promote AI-related sub-projects from the `bashscripts/ai/` directory to the project root. This ensures:
- **Visibility**: Specialized tools are easily accessible from the root.
- **Consistency**: Standardized symlinking strategy.
- **Efficiency**: Rapid environment setup for AI developers.

## 📊 Quality Status
- **PHPStan Level**: 10 (Target)
- **Status**: Development In Progress

## 🔗 Links
- [Xot Module](../../Xot/docs/README.md)
